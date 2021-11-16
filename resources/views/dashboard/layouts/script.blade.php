<script>
    function loading(slugInput) {
        const elLoading = document.createElement('small');
        elLoading.innerHTML = 'loading...';
        slugInput.parentNode.appendChild(elLoading);
        slugInput.setAttribute('disabled', 'true')
    }

    function removeLoading(slugInput) {
        slugInput.nextElementSibling.remove();
        slugInput.removeAttribute('disabled');

    }

    function generateSlug(source, slug, urlAJAX) {

        const sourceInput = document.querySelector(`#${source}`);
        const slugInput = document.querySelector(`#${slug}`);
        const url = urlAJAX;

        loading(slugInput);

        fetch(url, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                _token: '{{ csrf_token() }}',
                keyValue: sourceInput.value,
            })
        }).then(response => response.json()).then(response => {
            slugInput.value = response.slug;
            removeLoading(slugInput);
        });

    }
</script>
