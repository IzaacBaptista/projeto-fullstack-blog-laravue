<template>
    <section class="newsletter section">
        <div class="container">
            <h2 class="title section-title" data-name="Newsletter">Newsletter</h2>
            <div class="form-container-inner">
                <h6 for="emailInput" class="title newsletter-title">Subscribe to Codigo Simples</h6>
                <p class="newsletter-description">Insira seu email para ficar por dentro das novidades.</p>
                <form action="#" class="form" id="subscribeForm">
                    <!-- Modal -->
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Obrigado por se inscrever! Você receberá nossas atualizações em breve.</p>
                        </div>
                    </div>
                    <input class="form-input" type="text" id="emailInput" placeholder="Enter your email address" required>
                    <button class="btn form-btn" type="submit">
                        <i class="ri-mail-send-line"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>
