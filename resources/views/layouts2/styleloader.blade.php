<style>
        /* Préloader principal */
        .preloader {
            position: fixed;
            inset: 0;
            background-color: #0a0a0a;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            overflow: hidden;
        }

        /* Animation centrale */
        .animation-preloader {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .spinner {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top-color: #ff6600;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Texte animé */
        .txt-loading {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            letter-spacing: 4px;
            color: #fff;
            display: inline-block;
        }

        .letters-loading {
            display: inline-block;
            animation: flash 1.5s infinite;
        }

        .letters-loading:nth-child(1) {
            animation-delay: 0s;
        }

        .letters-loading:nth-child(2) {
            animation-delay: 0.1s;
        }

        .letters-loading:nth-child(3) {
            animation-delay: 0.2s;
        }

        .letters-loading:nth-child(4) {
            animation-delay: 0.3s;
        }

        .letters-loading:nth-child(5) {
            animation-delay: 0.4s;
        }

        .letters-loading:nth-child(6) {
            animation-delay: 0.5s;
        }

        .letters-loading:nth-child(8) {
            animation-delay: 0.6s;
        }

        .letters-loading:nth-child(9) {
            animation-delay: 0.7s;
        }

        .letters-loading:nth-child(10) {
            animation-delay: 0.8s;
        }

        .letters-loading:nth-child(11) {
            animation-delay: 0.9s;
        }

        .letters-loading:nth-child(12) {
            animation-delay: 1s;
        }

        @keyframes flash {

            0%,
            100% {
                opacity: 0.2;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        /* Animation rotation */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Animation de fermeture */
        .loader {
            position: absolute;
            inset: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .loader-section {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .loader-section .bg {
            background-color: #ff6600;
            width: 100%;
            height: 100%;
            transform: translateY(100%);
            animation: slideUp 1.2s ease-out forwards;
        }

        .section-right .bg {
            animation-delay: 0.2s;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
            }
        }
    </style>
