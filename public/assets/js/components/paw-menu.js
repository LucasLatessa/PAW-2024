class PAWMenu {
    constructor() {
        this.form = document.querySelector('form');
        this.minPriceInput = document.getElementById('min_price');
        this.maxPriceInput = document.getElementById('max_price');
        this.sortSelect = document.getElementById('sort');
        this.directionSelect = document.getElementById('direction');
        this.init();
    }

    init() {
        this.form.addEventListener('submit', this.handleSubmit.bind(this));
    }

    handleSubmit(event) {
        event.preventDefault();
        const minPrice = this.minPriceInput.value;
        const maxPrice = this.maxPriceInput.value;
        const sort = this.sortSelect.value;
        const direction = this.directionSelect.value;
        // Crear una cadena de consulta con los datos del formulario
        const queryString = `?min_price=${minPrice}&max_price=${maxPrice}&sort=${sort}&direction=${direction}`;
        
        // Redirigir al controlador con la cadena de consulta
        window.location.href = queryString;
    }
}


