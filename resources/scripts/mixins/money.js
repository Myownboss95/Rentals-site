export const format_money = {
    methods: {
        format_money(amount) {
            return amount.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
            });
        }
    }
}
