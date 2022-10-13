@if(session()->has('success'))
  <div x-data="{show:true}" x-init='setTimeout(()=> show = false, 3080)'
    x-show='show'
     class="fixed top-0 bg-laravel left-1/2 text-white px-48 py-3 inset-x-0 top-0   " >
    <p>
        {{session('success')}}
    </p>
</div>
@endif    