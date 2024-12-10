   {{-- SCRIPTS --}}
   @script
       <script>
           window.addEventListener('close-modal', event => {
               $('#createModal').modal('hide');
               $('#deleteModal').modal('hide');
           });

           window.addEventListener('show-create-modal', event => {
               $('#createModal').modal('show');
           });

           window.addEventListener('show-delete-modal', event => {
               $('#deleteModal').modal('show');
           });

           $(document).ready(function() {
               // alert("The paragraph was clicked.");
           });
       </script>
   @endscript
