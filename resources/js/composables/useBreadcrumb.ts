import { BreadcrumbItem } from '@/types';

export const health: BreadcrumbItem = {
    title: 'Health',
    href: '/health',
};

export const categories: BreadcrumbItem = {
    title: 'Categories',
    href: '/categories',
};

export const weights: BreadcrumbItem = {
    title: 'Weights',
    href: '/weights',
};

export function getBreadcrumbs(items: BreadcrumbItem[]): BreadcrumbItem[] {
    return [health, ...items];
}