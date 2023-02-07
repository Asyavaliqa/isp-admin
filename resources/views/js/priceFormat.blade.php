<script>
    /**
     * @param {string} HTML ID
     */
    function updateTextView(formatedId, realId) {
        const formated = document.getElementById(formatedId)
        const real = document.getElementById(realId)

        formated.value = formatNumber(formated.value)
        real.value = getNumber(formated.value)
    }

    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }

    function getNumber(_str) {
        var arr = _str.split('');
        var out = new Array();
        for (var cnt = 0; cnt < arr.length; cnt++) {
            if (isNaN(arr[cnt]) == false) {
                out.push(arr[cnt]);
            }
        }
        return Number(out.join(''));
    }
</script>
