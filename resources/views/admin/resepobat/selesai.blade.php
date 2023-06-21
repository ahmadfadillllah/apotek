<div class="modal fade" id="selesaiPasien-{{ $pasien->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon
                    src="https://cdn.lordicon.com/tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon>
                <div class="mt-4 pt-4">
                    <h4>Yakin ingin menyelesaikan pasien</h4>
                    <p class="text-muted"> Jika selesai, pasien harus mengantri kembali untuk berobat!!!</p>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('resepobat.selesai', $pasien->id) }}" type="button"  class="btn btn-warning">Selesai</a>
                </div>
            </div>
        </div>
    </div>
</div>
