import { ref, readonly, onMounted } from "vue";

export type CartItem = Omit<Product, "type_id" | "type">;

let cartItem = ref<CartItem[]>([]);

let firstRender = false;

function syncToLocalStorage() {
    localStorage.setItem("cart", JSON.stringify(cartItem.value));
}

export default function useCart() {
    function addItemToCart(newItem: CartItem) {
        let foundItem = cartItem.value.find(
            (cartItem) => cartItem.id === newItem.id
        );
        if (foundItem) {
            foundItem.qty += 1;
            return;
        }
        cartItem.value.push(newItem);
        syncToLocalStorage();
    }

    function decreaseItem(id: number) {
        let foundItem = cartItem.value.find((cartItem) => cartItem.id === id);
        if (!foundItem) return;
        if (foundItem.qty === 1) {
            removeItemFromCart(foundItem.id);
            return;
        }
        foundItem.qty -= 1;

        syncToLocalStorage();
    }

    function increaseItem(id: number) {
        let foundItem = cartItem.value.find((cartItem) => cartItem.id === id);
        if (!foundItem) return;
        foundItem.qty += 1;

        syncToLocalStorage();
    }

    function removeItemFromCart(id: number) {
        cartItem.value = cartItem.value.filter(
            (cartItem) => cartItem.id !== id
        );
        syncToLocalStorage();
    }

    function getItemById(id: number) {
        return cartItem.value.find((item) => item.id === id);
    }

    function isProductInCart(id: number) {
        let foundItem = cartItem.value.find((cartItem) => cartItem.id === id);
        return !!foundItem;
    }

    function resetCart() {
        cartItem.value = [];
        syncToLocalStorage();
    }

    onMounted(() => {
        if (!firstRender) {
            const cartItemFromLocalStorage = JSON.parse(
                localStorage.getItem("cart") || "[]"
            );
            cartItem.value = cartItemFromLocalStorage;

            firstRender = true;
        }
    });

    return {
        decreaseItem,
        increaseItem,
        removeItemFromCart,
        addItemToCart,
        getItemById,
        isProductInCart,
        cartItemData: readonly(cartItem),
        resetCart,
    };
}
