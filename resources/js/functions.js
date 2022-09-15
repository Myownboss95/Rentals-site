import { info, error } from "./toast"

export const copy = text => {
    navigator
        .clipboard
        .writeText(text)
        .then(
            _ => info('Copied to clipboard'),
            _ => error('Copy to clipboard failed.')

        )
}

export const str_limit = (str, limit = 10, end = '...') => {
    if (str.length > limit) str = str.slice(0, limit) + end;
    return str;
}

export const profile_picture = photo => `/storage/profile_pictures/${ photo }`;

export const capitalize = str => str.charAt(0).toUpperCase() + str.slice(1);



