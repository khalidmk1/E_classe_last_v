<ul class="contacts">
    @foreach ($conversations as $item)
        <li wire:click="selectConversation({{ $item->id }})">
            <div class="d-flex bd-highlight" style="cursor: pointer">
                <div class="img_cont">
                    @if ($item->sender_id === Auth::user()->id)
                        @php
                            $user = App\Models\User::find($item->receiver_id);
                        @endphp
                        <img src="{{ asset('images/avatars') }}/{{ $user->avatar }}" class="rounded-circle user_img">
                    @else
                        @php
                            $user = App\Models\User::find($item->sender_id);
                        @endphp
                        <img src="{{ asset('images/avatars') }}/{{ $user->avatar }}"
                            class="rounded-circle user_img">
                    @endif
                </div>
                <div class="user_info">
                    @if ($item->receiver_id === auth()->user()->id)
                        <span>{{ \App\Models\User::find($item->sender_id)->name }}</span>
                    @else
                        <span>{{ \App\Models\User::find($item->receiver_id)->name }}</span>
                    @endif
                    @if ($item->Messages->count() != 0)
                        <p>{{ Str::limit($item->Messages->last()->message, 10, '...') }}</p>
                    @else
                        <p>No Message</p>
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>


