type Product = {
    id: number;
    name: string;
    description: string;
    product_url: string;
    qty: number;
    price: number;
    type_id: number;
    type: TypeProduct;
};

type Order = {
    id: number;
    address: string;
    total: number;
    user_id: number;
    status: "P" | "S";
    order_details: OrderDetail[];
    created_at: Date;
};

type OrderDetail = {
    id: number;
    quantity: string;
    order_id: number;
    product_id: number;
    product: Pick<Product, "product_url" | "id" | "type" | "name" | "price">;
};

type TypeProduct = {
    id: number;
    name: string;
};
