<div class="modal fade" id="changePassword-{{ $u->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
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
                    <h4>Yakin mereset password user</h4>
                    <p class="text-muted"> Password default: <span class="badge text-bg-primary">password123</span></p>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('datauser.changepassword', $u->id) }}" type="button"  class="btn btn-warning">Reset Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
