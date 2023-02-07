<script>
    function preview(event, id) {
        const output = document.getElementById(id)

        if (!event.target.files[0] && output) {
            return false;
        }

        output.src = URL.createObjectURL(event.target.files[0])

        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    }
</script>
