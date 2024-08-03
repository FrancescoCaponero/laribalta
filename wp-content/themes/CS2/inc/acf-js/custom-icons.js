(function() {
    tinymce.PluginManager.add('custom_icons', function(editor, url) {
        var iconList = [
            {text: 'Cuore', value: '<i class="fas fa-heart"></i>'},
            {text: 'Automobile', value: '<i class="fas fa-car"></i>'},
            {text: 'Casa', value: '<i class="fas fa-home"></i>'},
            {text: 'Gioco', value: '<i class="fas fa-gamepad"></i>'},
            {text: 'Musica', value: '<i class="fas fa-music"></i>'},
            {text: 'Fotocamera', value: '<i class="fas fa-camera"></i>'},
            {text: 'Calcio', value: '<i class="fas fa-football-ball"></i>'},
            {text: 'Computer', value: '<i class="fas fa-laptop"></i>'},
            {text: 'Libro', value: '<i class="fas fa-book"></i>'},
            {text: 'Telefono', value: '<i class="fas fa-phone"></i>'},
            {text: 'Caffè', value: '<i class="fas fa-coffee"></i>'},
            {text: 'Bici', value: '<i class="fas fa-bicycle"></i>'},
            {text: 'Aereo', value: '<i class="fas fa-plane"></i>'},
            {text: 'Luna', value: '<i class="fas fa-moon"></i>'},
            {text: 'Sole', value: '<i class="fas fa-sun"></i>'},
            {text: 'Stella', value: '<i class="fas fa-star"></i>'},
            {text: 'Utente', value: '<i class="fas fa-user"></i>'},
            {text: 'Chiave', value: '<i class="fas fa-key"></i>'},
            {text: 'Carta di Credito', value: '<i class="fas fa-credit-card"></i>'},
            {text: 'Shopping', value: '<i class="fas fa-shopping-cart"></i>'},
            {text: 'Regalo', value: '<i class="fas fa-gift"></i>'},
            {text: 'Hippo', value: '<i class="fa-solid fa-hippo"></i>'}
        ];
        

        editor.addButton('custom_icons', {
            type: 'listbox',
            text: 'Icone',
            onselect: function(e) {
                editor.insertContent(this.value());
            },
            values: iconList,
            onPostRender: function() {
            },
        });
    });
})();
