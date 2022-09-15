import iziToast from "izitoast";

iziToast.settings({
    position: 'bottomCenter',
})

export const success = message => {
    iziToast.success({
        message
    })
}

export const error = message => {
    iziToast.error({
        message
    })
}

export const info = message => {
    iziToast.info({ message });
}
