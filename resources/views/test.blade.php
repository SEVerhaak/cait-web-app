<main class=" flex flex-col gap-[7vw]">
    <h1 class="text-f150 font-black mb-6 leading-none">OVER ONS</h1>

    <section class="w-ful text-end">
        <h3 class="font-extrabold text-f48">HET DOEL VAN <span class="text-redCait">CAIT</span></h3>
        <p class="text-f24 font-medium ml-[30vw] ">Cait is de studievereniging van het CMI-gebouw aan de Hogeschool Rotterdam, die studenten verbindt, inspireert en creëert een gezellige sfeer voor studenten.</p>
    </section>

    <section>
        <h3 class="font-extrabold text-f48">WAT KAN <span class="text-redCait">CAIT</span> DOEN</h3>
        <p class="text-f24 font-medium mr-[30vw]">Cait is de studievereniging van het CMI-gebouw aan de Hogeschool Rotterdam, die studenten verbindt, inspireert en creëert een gezellige sfeer voor studenten.</p>
    </section>

    <section>
        <h2 class="font-extrabold text-f96 text-end leading-loose">ONS TEAM</h2>
        <div class="-mx-[9.5vw] relative">
            <div id="scroll-container" class="flex space-x-6 overflow-x-auto px-[9.5vw] no-scrollbar">
            </div>
        </div>
    </section>

    <section>
        <h3 class="font-extrabold text-f48 text-center">JOIN <span class="text-redCait">CAIT</span> NU</h3>
        <p class="text-f24 font-medium text-center mb-[2vw]">Wil je meedoen? Meld je aan!</p>

        <form method="POST" action="" class="flex justify-center gap-[1.5vw] items- mb-[5vw] ">
            @csrf

            <!-- Left column -->
            <div class="flex flex-col w-[35vw] gap-[2vw]">
                <input type="text" name="name" placeholder="Volledige naam"
                       class="w-full border-none rounded-[0.5vw] p-[0.8vw] bg-gray-100"
                       style="box-shadow: inset 0 0 4px rgba(0,0,0,0.3);">

                <select name="study" class="w-full border-none rounded-[0.5vw] p-[0.8vw] bg-gray-100"
                        style="box-shadow: inset 0 0 4px rgba(0,0,0,0.3);" required>
                    <option value="" disabled selected>Kies je opleiding/position</option>
                    <option value="Informatica">Informatica</option>
                    <option value="Creative Media and Game Technologies">Creative Media and Game Technologies</option>
                    <option value="Technische Informatica">Technische Informatica</option>
                    <option value="Communication and Multimedia Design">Communication and Multimedia Design</option>
                    <option value="Business IT & Management">Business IT & Management</option>
                    <option value="AI & Data Science">AI & Data Science</option>
                    <option value="Docent">Docent</option>
                    <option value="HR Medewerker">HR Medewerker</option>
                    <option value="Andere">Andere</option>
                </select>

                <select name="study" required
                        class="w-full border-none rounded-[0.5vw] p-[0.8vw] bg-gray-100"
                        style="box-shadow: inset 0 0 4px rgba(0,0,0,0.3);">
                    <option value="" disabled selected>Position</option>
                    <option value="Informatica">Bestuur</option>
                    <option value="Creative Media and Game Technologies">Council</option>
                    <option value="Technische Informatica">Opleiding persoon</option>
                </select>
            </div>

            <!-- Right column -->
            <div class="flex flex-col w-[35vw] gap-[2vw]">

                <input type="text" name="extra" placeholder="School e-mail"
                       class="w-full border-none rounded-[0.5vw] p-[0.8vw] bg-gray-100"
                       style="box-shadow: inset 0 0 4px rgba(0,0,0,0.3);">

                <input type="text" name="extra" placeholder="Telefoon nummer"
                       class="w-full border-none rounded-[0.5vw] p-[0.8vw] bg-gray-100"
                       style="box-shadow: inset 0 0 4px rgba(0,0,0,0.3);">

            </div>
        </form>

    </section>

</main>
