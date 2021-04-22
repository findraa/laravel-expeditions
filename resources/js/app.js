require('./bootstrap');

function dataTableController (id) {
    return {
        id,
        deleteItem() {
            Swal.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItem', this.id);
                }
            })
        }
    }
}

function dataTableMainController () {
    return {
        setCallback() {
            Livewire.on('deleteResult', (result) => {
                if (result.status) {
                    Swal.fire(
                        'Deleted!',
                        result.message,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error!',
                        result.message,
                        'error'
                    );
                }
            });
        }
    }
}

window.__controller = {
    dataTableController,
    dataTableMainController
}
