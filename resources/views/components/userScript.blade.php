<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('user/js/main.js')}}"></script>


<!-- Pengurangan Otomatis  -->
<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('leave_balance').value;
        var txtSecondNumberValue = document.getElementById('leave_amount').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('current_leave').value = result;
        }
    }
</script>

{{-- SA Cancel Application --}}
<script>
    $(".swal-confirm").click(function() { 
        var id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "Once canceled, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $(`#delete${id}`).submit();
            }
            });
    });
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>