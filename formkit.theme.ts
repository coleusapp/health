import { rootClasses as baseRootClasses } from '../support/formkit.theme';
import type { FormKitNode } from '@formkit/core'

export function rootClasses(sectionName: string, node: FormKitNode) {
    const base = baseRootClasses(sectionName, node)

    return {
        ...base,
    }
}
