export interface FormattedResponse<T> {
    count?: number;
    data: T;
    status: boolean;
    total?: number;
    message?: string;
}