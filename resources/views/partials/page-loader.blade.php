<style>
    .page-loader {
        position: fixed;
        display: flex;
        flex-direction: row;
        justify-content: center;
        left: 0px;
        top: 0px;
        width: 100vw;
        height: 100vh;
        z-index: 9999;
        background: #fff;
        color: #000;
        text-align: center;
    }

    .page-loader img {
        width: 75px;
        height: 80px;
        top: 50%;
        left: 50%;
        margin-top: -40px;
        margin-left: -37px;
        position: absolute;
    }

    .sk-chase {
        width: 40px;
        height: 40px;
        position: relative;
        animation: sk-chase 2.5s infinite linear both;
        align-self: center;
    }

    .sk-chase-dot {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        animation: sk-chase-dot 2.0s infinite ease-in-out both;
    }

    .sk-chase-dot:before {
        content: '';
        display: block;
        width: 25%;
        height: 25%;
        background-color: #000;
        border-radius: 100%;
        animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
    }

    .sk-chase-dot:nth-child(1) {
        animation-delay: -1.1s;
    }

    .sk-chase-dot:nth-child(2) {
        animation-delay: -1.0s;
    }

    .sk-chase-dot:nth-child(3) {
        animation-delay: -0.9s;
    }

    .sk-chase-dot:nth-child(4) {
        animation-delay: -0.8s;
    }

    .sk-chase-dot:nth-child(5) {
        animation-delay: -0.7s;
    }

    .sk-chase-dot:nth-child(6) {
        animation-delay: -0.6s;
    }

    .sk-chase-dot:nth-child(1):before {
        animation-delay: -1.1s;
    }

    .sk-chase-dot:nth-child(2):before {
        animation-delay: -1.0s;
    }

    .sk-chase-dot:nth-child(3):before {
        animation-delay: -0.9s;
    }

    .sk-chase-dot:nth-child(4):before {
        animation-delay: -0.8s;
    }

    .sk-chase-dot:nth-child(5):before {
        animation-delay: -0.7s;
    }

    .sk-chase-dot:nth-child(6):before {
        animation-delay: -0.6s;
    }

    @keyframes sk-chase {
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes sk-chase-dot {
        80%, 100% {
            transform: rotate(360deg);
        }
    }

    @keyframes sk-chase-dot-before {
        50% {
            transform: scale(0.4);
        }
        100%, 0% {
            transform: scale(1.0);
        }
    }
</style>
<div class="page-loader">
    <div class="sk-chase">
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
    </div>
</div>
