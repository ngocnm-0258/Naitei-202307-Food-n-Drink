<x-app-layout>
    <x-slot name="header">{{ __('order.show.title', ['id' => $order->id]) }}</x-slot>

    <div class='py-8'>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form action="{{ route('orders.createComment') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-4 mb-4 bg-white rounded-md">
                    <div
                        class="border rounded-md w-full p-2 mb-4 mt-2 border-blue-500">
                        {{ __('constant.orderStatus.' . $order->orderItems[0]->status) }}
                    </div>
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white shadow-sm sm:rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-2">{{ $order->contact->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ __('contact.Address') }}: {{ $order->contact->address }}</p>
                        <p class="text-gray-600 mb-2">{{ __('contact.Phone number') }}: {{ $order->contact->phone_number }}
                        </p>
                    </div>
                </div>
                <div class="p-4 mb-4 bg-white rounded-md">
                    @foreach ($order->orderItems as $orderItem)
                        <div class="flex mb-4 w-full">
                            <input type="hidden" id="order_item_id_{{$orderItem->id}}"
                                name="order_item_id[{{$orderItem->id}}]" value="{{$orderItem->id}}">
                            <input type="hidden" id="product_id_{{$orderItem->id}}"
                                name="product_id[{{$orderItem->id}}]" value="{{$orderItem->product_id}}">
                            <div class="w-1/6 mr-4">
                                @if (strpos($orderItem->product->photo, 'https://via.placeholder.com/') === 0)
                                    <img class="object-cover" src="{{ $orderItem->product->photo }}"
                                         alt="{{ $orderItem->product->name }}">
                                @else
                                    <img class="object-cover" src="{{ asset($orderItem->product->photo) }}"
                                         alt="{{ $orderItem->product->name }}">
                                @endif
                            </div>
                            <div class="grow">
                                <strong class="text-xl">{{ $orderItem->product->name }}</strong>
                                <div class="flex justify-between mt-4 items-end">
                                    <div class="text-opacity-80 text-sm">{{ __('order.Quantity') }}:
                                        {{ $orderItem->quantity }}
                                    </div>
                                    <div class="text-black text-xl mr-4">
                                        {{ formatCurrency($orderItem->product->price) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <textarea class="border-gray-400 w-full rounded p-4" maxlength="200"
                                id="content_{{ $orderItem->id }}" name="content[{{ $orderItem->id }}]">
                                {{ $orderItem->review->content }}
                            </textarea>
                            <div class="flex flex-row-reverse text-sm text-gray-400">
                                {{ __('Tối đa 200 ký tự') }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex flex-row-reverse">
                    <button class="bg-red-600 text-white font-bold w-1/6 h-10 rounded">
                        {{ __('Gửi đánh giá') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
