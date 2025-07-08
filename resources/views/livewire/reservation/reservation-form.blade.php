<section class="py-16 -mt-8 relative z-20 bg-orange-50">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="rounded-lg bg-card text-card-foreground shadow-sm glass-card restaurant-shadow border-0">
                <div class="flex flex-col space-y-1.5 p-6 text-center pb-6">
                    <h3 class="tracking-tight text-3xl font-bold text-gray-800">Rezervácia stola</h3>
                    <p class="text-lg text-gray-600">Vyberte si ideálny čas pre váš návšteva</p>
                </div>
                <div class="p-6 pt-0">
                    <div class="space-y-6">
                        <form class="space-y-6">
                            <div class="grid md:grid-cols-3 gap-4">
                                <div class="space-y-2">
                                    <label class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-medium text-gray-700" for="date">Dátum *</label><button
                                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full justify-start text-left font-normal border-gray-300 hover:border-orange-300 text-muted-foreground"
                                        type="button" aria-haspopup="dialog" aria-expanded="false"
                                        aria-controls="radix-:r0:" data-state="closed"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-calendar mr-2 h-4 w-4">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>Vyberte dátum</button></div>
                                <div class="space-y-2"><label
                                        class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-medium text-gray-700"
                                        for="time">Čas *</label><button type="button" role="combobox"
                                        aria-controls="radix-:r1:" aria-expanded="false" aria-autocomplete="none"
                                        dir="ltr" data-state="closed" data-placeholder=""
                                        class="flex h-10 w-full items-center justify-between rounded-md border bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1 border-gray-300 hover:border-orange-300"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-clock mr-2 h-4 w-4">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg><span
                                            style="pointer-events: none;">Vyberte čas</span><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-chevron-down h-4 w-4 opacity-50"
                                            aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg></button><select aria-hidden="true" tabindex="-1"
                                        style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                    </select></div>
                                <div class="space-y-2"><label
                                        class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-medium text-gray-700"
                                        for="guests">Počet hostí *</label><button type="button" role="combobox"
                                        aria-controls="radix-:r2:" aria-expanded="false" aria-autocomplete="none"
                                        dir="ltr" data-state="closed" data-placeholder=""
                                        class="flex h-10 w-full items-center justify-between rounded-md border bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1 border-gray-300 hover:border-orange-300"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-users mr-2 h-4 w-4">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg><span
                                            style="pointer-events: none;">Počet osôb</span><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-chevron-down h-4 w-4 opacity-50"
                                            aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg></button><select aria-hidden="true" tabindex="-1"
                                        style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                                        <option value="1">1 osoba</option>
                                        <option value="2">2 osoby</option>
                                        <option value="3">3 osoby</option>
                                        <option value="4">4 osoby</option>
                                        <option value="5">5 osôb</option>
                                        <option value="6">6 osôb</option>
                                        <option value="7">7 osôb</option>
                                        <option value="8">8 osôb</option>
                                    </select></div>
                            </div>
                            <div class="pt-4"><button
                                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-primary hover:bg-primary/90 h-10 px-4 w-full bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-semibold py-3 text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl"
                                    type="submit">Pokračovať k výberu stola</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
