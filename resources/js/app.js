import './bootstrap';
import Swal from 'sweetalert2';

function deleteConfirm(form) {
  Swal.fire({
    title: '本当に削除しますか？',
    text: 'この操作は元に戻せません！',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: '削除する',
    cancelButtonText: 'キャンセル',
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  });
}

window.deleteConfirm = deleteConfirm;
