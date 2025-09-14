const toastr = {
  show: function(type, message, title = '') {
    // Pilih warna header berdasarkan type
    let bgClass = 'bg-primary text-white';
    if (type === 'success') bgClass = 'bg-success text-white';
    if (type === 'error') bgClass = 'bg-danger text-white';
    if (type === 'warning') bgClass = 'bg-warning text-dark';
    if (type === 'info') bgClass = 'bg-info text-dark';

    // Template toast
    const toastHTML = `
      <div class="toast align-items-center border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
        <div class="toast-header ${bgClass}">
          <strong class="me-auto">${title || type.toUpperCase()}</strong>
          <button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
          ${message}
        </div>
      </div>
    `;

    // Tambahkan ke container
    const container = document.getElementById("toast-container");
    container.insertAdjacentHTML("beforeend", toastHTML);

    // Ambil elemen terakhir
    const toastEl = container.lastElementChild;
    const toast = new bootstrap.Toast(toastEl);

    // Show toast
    toast.show();

    // Hapus dari DOM setelah selesai
    toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
  },

  success: function(message, title) {
    this.show('success', message, title);
  },
  error: function(message, title) {
    this.show('error', message, title);
  },
  warning: function(message, title) {
    this.show('warning', message, title);
  },
  info: function(message, title) {
    this.show('info', message, title);
  }
};

function formatRupiah(angka) {
    if (!angka) return "Rp. 0";
    return "Rp. " + parseFloat(angka)
        .toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
}

document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.querySelector(".layout-menu-toggle");
  if (toggle) {
    toggle.addEventListener("click", function () {
      document.body.classList.toggle("layout-menu-collapsed");
    });
  }
});