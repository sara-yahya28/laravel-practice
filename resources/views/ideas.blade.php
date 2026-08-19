{{-- <x-fileName> -> when this strutcure is seen,
    automatically search for components folder --}}

{{-- if file is not, use @yield() + @extent() --}}
<x-layout title="Ideas">

{{-- <h1>Welcome Page</h1>
<p>
{{$greetings}}, {{$person}}!
</p>
@dump($tasks)
    <button>You have {{count($tasks)}}</button>
    @forelse ($tasks as $task )
        <span style="background-color:#6cb2dd; padding: 15px; border-radius:15px;margin-top:15px;">{{$task}}</span>
     --}}
{{-- if condtn is false --}}
    {{-- @empty 
        <p>There are not active tasks</p>
    @endforelse --}}

{{-- Action المسار أو الرابط (URL) الذي سيتم إرسال بيانات النموذج إليه على الخادم لطلب معالجتها. --}}
    <form action="/ideas" method="POST">
        @csrf
        <div class="col-span-full m-[20px]">
          <label for="newIdea" class="block text-sm/6 font-medium text-white">New Ideas</label>
          <div class="mt-2">
            <textarea id="newIdea" name="newIdea" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-400">Have an idea, and want to save it for later?</p>
        </div>
          <div class="mt-6 flex items-center start gap-x-6">
    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
  </div>
        </form>
@if ( $newIdea->count())
    <div class="mt-6 text-white">
        <h2 class="font-bold">Your ideas</h2>
        <ul>
            @foreach ($newIdea as $ideaItem)
                <li class="text-sm">{{ $ideaItem->describtion }}</li>
            @endforeach
        </ul>
    </div>
@else
    <p class="text-white">There are no ideas to display</p>
@endif
</x-layout>