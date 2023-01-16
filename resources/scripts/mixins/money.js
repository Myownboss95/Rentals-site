export const format_money = {
    methods: {
        format_money(amount) {
            return amount.toLocaleString('en-NG', {
                style: 'currency',
                currency: 'NGN'
            });
        }
    }
}
