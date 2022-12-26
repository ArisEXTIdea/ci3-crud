<div id="content-wrapper" class="reltive flex flex-col items-center">
    <div id="content-header" class="w-full py-5 bg-gray-500">
        <h1 class="text-white text-center text-2xl font-bold">Edit Akun</h1>
    </div>
    <div id="page-btn" class="w-11/12 md:w-2/3 mt-10">
        <a href="/" class="py-3 px-5 bg-orange-400 hover:bg-orange-500 text-white rounded">
            <i class="fas fa-arrow-left mr-1"></i>
            Dashboard
        </a>
    </div>
    <?php if($this->session->flashdata('alert') == 'active'):?>
    <div id="page-alert" class="w-11/12 md:w-2/3 mt-10">
        <?php if($this->session->flashdata('alert-success') != ''):?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline"><?= $this->session->flashdata('alert-success') ?></span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        <?php endif;?>
        <?php if($this->session->flashdata('alert-fail') != ''):?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline"><?= $this->session->flashdata('alert-fail') ?>.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        <?php endif;?>
    </div>
    <?php endif;?>
    <div id="page-form" class="w-11/12 md:w-2/3 mt-10 p-10 bg-white border rounded-xl mb-10">
        <form action="/editDataImage" method="post" enctype="multipart/form-data">
            <div class="mb-5 hidden">
                <label for="uid" class="font-semibold">UID</label>
                <input type="text" name="uid" class="w-full border rounded px-5 py-3 mt-3" placeholder="emailku@domain.com" value="<?= $userData['uid'] ?>">
            </div>
            <div class="mb-5 hidden">
                <label for="oldimg" class="font-semibold">OldImage</label>
                <input type="text" name="oldimg" class="w-full border rounded px-5 py-3 mt-3" placeholder="emailku@domain.com" value="<?= $userData['image'] ?>">
            </div>
            <div class="mb-5">
                <label for="image" class="font-semibold">Upload Gambar Baru</label>
                <input type="file" name="image" class="w-full border rounded px-5 py-3 mt-3">
            </div>
            <div class="mb-5">
                <button type="submit" class="py-3 px-5 text-white rounded bg-sky-400 hover:bg-sky-500">
                    <i class="fas fa-save mr-1"></i>
                    Simpan Akun
                </button>
            </div>
        </form>
    </div>
</div>