<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">


                <div x-data="{ showMore: false }">

                    <span :class="{ 'line-clamp-none': showMore }" class="line-clamp-3">

                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat ipsum quisquam suscipit,
                            recusandae, quos cupiditate officiis repudiandae eos ea, temporibus quam sequi nemo sit
                            provident. Corrupti explicabo ipsa mollitia praesentium voluptate laboriosam ea itaque
                            magnam ad nobis nam a modi quibusdam tenetur, harum facere sapiente odit molestiae ullam aut
                            id in unde! Dolorum fugit quas, porro debitis quae, commodi quidem ipsa quos dicta maiores
                            repellendus molestiae, repellat quam quo sequi molestias suscipit itaque temporibus odit
                            magnam! Neque sunt modi harum numquam nihil soluta facilis tempora omnis optio distinctio
                            obcaecati eaque eos pariatur mollitia vel, doloribus cumque quaerat qui? Vero, animi
                            reiciendis? Repellendus, nemo voluptates tenetur consequuntur deleniti soluta, maiores vero
                            sequi ipsum similique quae modi unde aliquid ea beatae! Ipsam obcaecati quisquam pariatur
                            iure exercitationem similique tempore mollitia laudantium doloremque ullam praesentium est,
                            architecto quam quo ab eum excepturi molestias laboriosam veritatis autem sapiente quos
                            ducimus perspiciatis nisi? Voluptates adipisci placeat, voluptatum sequi numquam ab dolorem
                            possimus nulla perferendis corrupti commodi fugiat eligendi temporibus perspiciatis cum est
                            rem excepturi quam ipsum, hic ea. Nesciunt nostrum obcaecati, corporis voluptate voluptatem
                            autem voluptatibus officiis omnis at dolor natus aut? Molestiae itaque officia ipsam animi
                            enim unde natus autem amet nemo architecto? Fugit consequuntur corrupti voluptates repellat
                            in minus labore et doloribus? Harum illo dol
                            <br>
                            orum sequi velit voluptates quas perferendis, neque beatae veniam odio unde magni, alias
                            vitae assumenda dignissimos placeat. Fugiat, id optio porro asperiores ex laborum aut quod
                            possimus temporibus minus assumenda ab cumque aliquid. Fuga eaque dolorum repellendus eius
                            quisquam dolores nulla voluptatem cupiditate quidem natus. Laudantium dignissimos velit
                            consequatur, dicta atque quasi tempore natus cumque ipsa nesciunt, reiciendis veritatis quis
                            nostrum ipsum! Impedit dignissimos rem deserunt reiciendis dicta, cupiditate atque porro
                            nobis modi fugit nam expedita id sint ut. Neque animi ea molestias quo inventore suscipit
                            nesciunt architecto, necessitatibus culpa optio quos nobis libero magnam est alias esse
                            molestiae totam doloremque soluta voluptates illo quisquam sunt! Exercitationem repellat
                            animi numquam temporibus sint, quidem magnam tempora iure. Distinctio, doloribus.
                            Perferendis, expedita quae facilis nulla, iste laboriosam consequuntur ea in necessitatibus
                            nihil, illo ipsa magnam nam plac
                            <br>
                            eat nostrum id dolorum cum. Voluptates odio nisi eligendi optio rerum corporis debitis,
                            impedit vero a. Obcaecati nihil voluptates repudiandae culpa accusantium perspiciatis velit
                            neque aspernatur magni laborum necessitatibus sit dicta nulla non laudantium fugiat, sed ab
                            et illum cumque! Distinctio, dignissimos suscipit delectus porro alias non! Porro molestiae
                            commodi blanditiis dolor ipsam dignissimos architecto facere sit, ratione odio omnis fuga.
                            Fugiat quibusdam eius sit provident error aliquid soluta ea. Expedita optio totam, quos
                            perspiciatis hic aperiam illo tenetur accusamus soluta vel temporibus error voluptas
                            deleniti cupiditate blanditiis nihil quidem inventore quae asperiores. Officia recusandae
                            architecto velit cupiditate possimus perspiciatis, consequuntur nulla harum id praesentium
                            sequi nostrum mollitia officiis, molestias fugit quo omnis? Perferendis dolore, tempore odit
                            unde aspernatur adipisci quo iste laudantium architecto saepe ipsum possimus nam dolorum
                            veritatis quidem placeat autem earum doloribus consectetur nihil accusantium veniam? Rem,
                            soluta facilis aliquid eum nisi distinctio repellat? Quae quo sapiente voluptatibus ipsa
                            veritatis. Tempora, sint!
                        </p>

                    </span>

                    <a role="button" class="block" @click="showMore = !showMore">Read More...</a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
