<div class="profileContainer">
    <div>
        <img src="https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg?size=338&ext=jpg&ga=GA1.1.735520172.1710720000&semt=ais"
            alt="Profile">
    </div>
    <div>
        <h2>{{ Auth::user()->name }}</h2>
        <h4>{{ Auth::user()->email }}</h4>
        <h6>{{ Auth::user()->created_at }}</h6>
        <a href="/user/edit">Edit</a>
    </div>

</div>
