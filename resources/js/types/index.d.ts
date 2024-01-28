export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    username: string;
    profile_url: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
};
