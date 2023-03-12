<nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a href="{{ route('box.index') }}" class="navbar-brand py-0">
            <img src="/images/logo.png" alt="STOCKER" style="height: 39px">
        </a>
        <div class="d-flex">
            <div class="dropleft">
                <button type="button" id="avatar_dropdown"
                    class="btn btn-inline-light dropdown-toggle pr-0"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    @if (!empty($user->avatar_img))
                        <img src="{{ asset('storage/avatars/'. $user->avatar_img) }}" class="rounded-circle" style="object-fit: cover; height: 30px">
                    @else
                        <img src="{{ asset('/images/user.png') }}" class="rounded-circle" style="object-fit: cover; height: 30px;">
                    @endif
                    <span>{{ $user->name }}</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="avatar_dropdown">
                    <a href="{{ route('box.new') }}" class="dropdown-item">
                        <i class="fas fa-solid fa-boxes-packing text-left" style="width: 30px"></i> ボックス登録
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-solid fa-cart-plus text-left" style="width: 30px"></i> アイテム編集
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fa-solid fa-tags text-left" style="width: 30px"></i> タグ編集
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fa-solid fa-file-import text-left" style="width: 30px"></i>  アイテム入庫
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fa-solid fa-file-export text-left" style="width: 30px"></i> アイテム出庫
                    </a>
                    <a href="{{ route('mypage.edit-form') }}" class="dropdown-item">
                        <i class="fa-solid fa-address-card text-left" style="width: 30px"></i> プロフィール編集
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-left" style="width: 30px"></i>ログアウト
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>