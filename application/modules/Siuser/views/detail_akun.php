<div id="content-wrapper" class="reltive flex flex-col items-center relative">
    <div id="modal" class="w-full h-screen bg-gray-900/50 absolute flex items-center justify-center hidden">
        <div class="w-5/5 md:w-1/3 bg-white p-10 rounded">
            <div>
                <h1 class="text-lg font-semibold text-center">Apakah Anda yakin menghapus user ini?</h1>
            </div>
            <div class="w-full flex justify-center my-10">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_VmD8Sl.json"  background="rgba(0, 0, 0, 0)"  speed="1"  style="width: 150px; height: 150px;"  loop  autoplay></lottie-player>
            </div>
            <div class="w-full flex flex-row justify-center">
                <a class="mx-1 py-3 px-5 bg-red-400 hover:bg-red-500 text-white rounded" id="modal-confirm">
                    Iya, Hapus
                </a>
                <button onclick="handleModalHide()" id="modal-cancel" class="mx-1 py-3 px-5 bg-sky-400 hover:bg-sky-500 text-white rounded">
                    Batal Hapus
                </button>
            </div>
        </div>
    </div>
    <div id="content-header" class="w-full py-5 bg-gray-500">
        <h1 class="text-white text-center text-2xl font-bold">Detail Akun : <?= $userData['full_name'] ?></h1>
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
    <div id="account-detail" class="w-11/12 md:w-2/3 mt-10 p-10 bg-white border rounded-xl mb-10 flex flex-col items-center">
        <div id="image" class="w-1/3"> 
            <img src="<?= base_url() ?>assets/uploads/<?= $userData['image']?>" alt="profile">
        </div>
        <div id="account-control" class="w-full mt-10">
            <a href="/edit-akun/<?= $userData['uid']?>" class="mx-1 py-3 px-3 bg-sky-400 hover:bg-sky-500 text-white rounded">
                <i class="fas fa-edit"></i>
            </a>
            <a href="/edit-image/<?= $userData['uid']?>" class="mx-1 py-3 px-3 bg-sky-400 hover:bg-sky-500 text-white rounded">
                <i class="fas fa-image"></i>
            </a>
            <button class="py-3 px-3 mx-1 rounded text-white bg-red-400 hover:bg-red-500" onclick="handleModalShow('<?= $userDatagi['uid']?>')">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div class="w-full mt-5">
            <div class="flex flex-row py-5 bg-gray-200 px-5">
                <div class="w-1/3">
                    Nama Lengkap
                </div>
                <div class="w-2/3">
                    : <?= $userData['full_name'] ?>
                </div>
            </div>
            <div class="flex flex-row py-5 bg-gray-100 px-5">
                <div class="w-1/3">
                    Email
                </div>
                <div class="w-2/3">
                    : <?= $userData['email'] ?>
                </div>
            </div>
            <div class="flex flex-row py-5 bg-gray-200 px-5">
                <div class="w-1/3">
                    Alamat
                </div>
                <div class="w-2/3">
                    : <?= $userData['address'] ?>
                </div>
            </div>
            <div class="flex flex-row py-5 bg-gray-100 px-5">
                <div class="w-1/3">
                    Gender
                </div>
                <div class="w-2/3">
                    : <?= $userData['gender'] == 'L' ? 'Laki-Laki': 'Permpuan' ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const handleModalShow = (val) => {
        $(document).ready(function () {
            $('#modal').removeClass('hidden');
            $('#modal-confirm').attr('href', `/deleteData/${val}`);
        });
    }

    const handleModalHide = () => {
        $(document).ready(function () {
            $('#modal').addClass('hidden');
            $('#modal-confirm').removeAttr(['href']);
        });
    }
</script>