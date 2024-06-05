class PAWMenu {
    constructor() {
        // Obtener el formulario
        this.form = document.querySelector('form');
        // Obtener el botón de filtrado
        this.filterButton = document.getElementById('filtrar');
        // Inicializar eventos
        this.initEvents();
      
    }

    initEvents() {
        // Evento para el cambio en el elemento con id 'order'
        document.getElementById('order').addEventListener('change', () => {
            this.form.submit();
        });

        // Evento para el cambio en el elemento con id 'category'
        document.getElementById('categoria').addEventListener('change', () => {
            this.form.submit();
        });

        // Evento de clic en el botón de filtrado
        this.filterButton.addEventListener('click', () => {
            this.form.submit();
        });

    }

    
}

