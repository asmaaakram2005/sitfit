    <!-- Write A nav bar code under this command. "Ahmed"-->



        



    





    
        <!-- NEVER DELETE THIS FORM, IT IS VERY IMPORTANT. "Ahmed" -->
    <form action="{{ route('logout') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Logout</button>
    </form>
