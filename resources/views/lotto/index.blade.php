<x-app-layout>
    <div>
        <div class="py-10 flex justify-center">
            <button class="p-2 bg-green-400 hover:bg-green-700 mr-5 rounded-md text-white font-bold"
                onclick="pension()">연금복권 번호</button>
            <form action="/lotto" method="POST">
                @csrf
                <button class="p-2 bg-gray-400 hover:bg-gray-700 rounded-md text-white font-bold" type="submit"
                    name="lotto">로또 번호</button>
            </form>
        </div>
        <div class="flex justify-center">
            <div id="pension">
            </div>
            <div class="lotto">
                @if (Session::has('numbers'))
                    <p>
                        @foreach (session('numbers') as $item)
                            {{ $item }}  
                        @endforeach
                    </p>
                @endif
            </div>
        </div>
        

        <script>
            function pension() {
                jo = Math.floor(Math.random() * (6 - 0)) + 0;
                document.getElementById("pension").innerHTML =
                    "<p>" + jo + "</p>"
            }

        </script>
        <?php
        // $pension_numbers = [];
        // while(1){
        // $number = rand(0, 9);

        // if (!in_array($number, $pension_numbers)) {
        // $pension_numbers[] = $number;
        // }

        // if (count($pension_numbers) > 5) {
        // break;
        // }
        // }
        ?>
        <p>
            {{-- @foreach ($pension_numbers as $item)
                {{ $item }}, 
            @endforeach --}}
        </p>
    </div>

</x-app-layout>
