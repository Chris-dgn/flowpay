<x-app-layout>

    <style>
        /* =========================================================
           FLOWPAY - PAGE CARTE
           ========================================================= */

        .flowpay-card-page {
            min-height: 100vh;
            background: #f8fafc;
        }

        .flowpay-card-container {
            width: 100%;
            max-width: 1024px;
            margin: 0 auto;
            padding: 24px 16px 40px;
            box-sizing: border-box;
        }

        .flowpay-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 24px;
        }

        .flowpay-back:hover {
            color: #0f172a;
        }

        .flowpay-title {
            margin-bottom: 24px;
        }

        .flowpay-title h1 {
            margin: 0;
            color: #020617;
            font-size: 30px;
            line-height: 1.2;
            font-weight: 700;
        }

        .flowpay-title p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        /* =========================================================
           STRUCTURE PRINCIPALE
           ========================================================= */

        .flowpay-main {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .flowpay-card-panel {
            min-width: 0;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
            padding: 24px;
            box-sizing: border-box;
        }

        .flowpay-management {
            min-width: 0;
            width: 100%;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
            overflow: hidden;
            box-sizing: border-box;
        }

        /* =========================================================
           TITRE CARTE
           ========================================================= */

        .flowpay-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .flowpay-eyebrow {
            margin: 0;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.4;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .flowpay-card-name {
            margin: 5px 0 0;
            color: #0f172a;
            font-size: 18px;
            line-height: 1.3;
            font-weight: 700;
        }

        .flowpay-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
            padding: 7px 11px;
            border-radius: 999px;
            background: #ecfdf5;
            color: #047857;
            font-size: 12px;
            line-height: 1;
            font-weight: 700;
        }

        .flowpay-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #10b981;
        }

        /* =========================================================
           CARTE BANCAIRE
           ========================================================= */

        .flowpay-card-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .flowpay-bank-card {
            position: relative;
            width: 100%;
            max-width: 380px;
            height: 215px;
            overflow: hidden;
            border-radius: 20px;
            padding: 22px;
            box-sizing: border-box;
            color: #ffffff;
            background:
                linear-gradient(
                    135deg,
                    #020617 0%,
                    #111c45 48%,
                    #2563eb 100%
                );
            box-shadow:
                0 18px 35px rgba(15, 23, 42, 0.20);
        }

        .flowpay-bank-card::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            right: -80px;
            top: -90px;
            border-radius: 50%;
            background: rgba(96, 165, 250, 0.18);
            filter: blur(30px);
        }

        .flowpay-bank-card::after {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            left: -90px;
            bottom: -100px;
            border-radius: 50%;
            background: rgba(129, 140, 248, 0.12);
            filter: blur(25px);
        }

        .flowpay-bank-top {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .flowpay-card-type {
            margin: 0;
            color: rgba(255, 255, 255, 0.55);
            font-size: 9px;
            line-height: 1.2;
            font-weight: 600;
            letter-spacing: 0.17em;
            text-transform: uppercase;
        }

        .flowpay-card-logo {
            margin-top: 5px;
            color: #ffffff;
            font-size: 19px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .flowpay-card-logo span {
            color: #93c5fd;
        }

        .flowpay-chip {
            width: 44px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 7px;
            border: 1px solid rgba(255,255,255,0.35);
            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.90),
                    rgba(148,163,184,0.45)
                );
            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.5);
        }

        .flowpay-card-number {
            position: relative;
            z-index: 2;
            margin-top: 38px;
            color: rgba(255,255,255,0.95);
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 15px;
            line-height: 1;
            letter-spacing: 0.15em;
            white-space: nowrap;
        }

        .flowpay-card-bottom {
            position: absolute;
            z-index: 2;
            left: 22px;
            right: 22px;
            bottom: 20px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }

        .flowpay-card-label {
            margin: 0 0 4px;
            color: rgba(255,255,255,0.40);
            font-size: 8px;
            line-height: 1;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }

        .flowpay-card-value {
            margin: 0;
            color: rgba(255,255,255,0.95);
            font-size: 11px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .flowpay-card-expiry {
            text-align: right;
        }

        /* =========================================================
           INFORMATIONS
           ========================================================= */

        .flowpay-card-info {
            display: flex;
            align-items: stretch;
            width: 100%;
            margin-top: 22px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            background: #f8fafc;
        }

        .flowpay-info-item {
            flex: 1 1 0;
            min-width: 0;
            padding: 13px 10px;
            text-align: center;
        }

        .flowpay-info-separator {
            width: 1px;
            margin: 11px 0;
            background: #e2e8f0;
        }

        .flowpay-info-label {
            margin: 0;
            color: #94a3b8;
            font-size: 10px;
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: 0.10em;
            text-transform: uppercase;
        }

        .flowpay-info-value {
            margin: 5px 0 0;
            color: #0f172a;
            font-size: 14px;
            line-height: 1.2;
            font-weight: 700;
        }

        .flowpay-info-value.active {
            color: #059669;
        }

        /* =========================================================
           GESTION
           ========================================================= */

        .flowpay-management-header {
            padding: 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .flowpay-management-title {
            margin: 5px 0 0;
            color: #0f172a;
            font-size: 18px;
            line-height: 1.3;
            font-weight: 700;
        }

        .flowpay-actions {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .flowpay-action {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border: 0;
            border-radius: 11px;
            background: transparent;
            text-align: left;
            cursor: pointer;
            box-sizing: border-box;
        }

        .flowpay-action:hover {
            background: #f8fafc;
        }

        .flowpay-action.danger:hover {
            background: #fff7f7;
        }

        .flowpay-action-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #f1f5f9;
            color: #475569;
            font-size: 16px;
        }

        .flowpay-action-icon.danger {
            background: #fef2f2;
            color: #dc2626;
            font-weight: 800;
        }

        .flowpay-action-content {
            min-width: 0;
            flex: 1;
        }

        .flowpay-action-title {
            display: block;
            color: #1e293b;
            font-size: 13px;
            line-height: 1.3;
            font-weight: 700;
        }

        .flowpay-action-title.danger {
            color: #dc2626;
        }

        .flowpay-action-description {
            display: block;
            margin-top: 3px;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.35;
        }

        .flowpay-action-arrow {
            flex-shrink: 0;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1;
        }

        .flowpay-protection {
            padding: 16px;
        }

        .flowpay-protection-box {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 13px;
            border: 1px solid #d1fae5;
            border-radius: 12px;
            background: #ecfdf5;
        }

        .flowpay-protection-icon {
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #d1fae5;
            color: #059669;
            font-size: 14px;
            font-weight: 800;
        }

        .flowpay-protection-title {
            margin: 0;
            color: #065f46;
            font-size: 13px;
            line-height: 1.3;
            font-weight: 700;
        }

        .flowpay-protection-text {
            margin: 4px 0 0;
            color: #047857;
            font-size: 11px;
            line-height: 1.5;
        }

        /* =========================================================
           SÉCURITÉ
           ========================================================= */

        .flowpay-security {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 20px;
            padding: 13px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            background: #ffffff;
            box-shadow: 0 1px 2px rgba(15,23,42,0.04);
        }

        .flowpay-security-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 14px;
            font-weight: 800;
        }

        .flowpay-security-title {
            margin: 0;
            color: #1e293b;
            font-size: 13px;
            line-height: 1.3;
            font-weight: 700;
        }

        .flowpay-security-text {
            margin: 3px 0 0;
            color: #64748b;
            font-size: 11px;
            line-height: 1.4;
        }

        /* =========================================================
           DESKTOP
           ========================================================= */

        @media (min-width: 1024px) {

            .flowpay-card-container {
                padding-top: 18px;
            }

            .flowpay-main {
                display: grid;
                grid-template-columns: minmax(0, 1fr) 320px;
                align-items: stretch;
                gap: 20px;
            }

            .flowpay-card-panel {
                width: 100%;
            }

            .flowpay-management {
                width: 320px;
            }

        }

        /* =========================================================
           PETIT ÉCRAN
           ========================================================= */

        @media (max-width: 640px) {

            .flowpay-card-container {
                padding: 18px 14px 30px;
            }

            .flowpay-title h1 {
                font-size: 26px;
            }

            .flowpay-card-panel {
                padding: 18px;
            }

            .flowpay-bank-card {
                height: 195px;
                padding: 19px;
                border-radius: 18px;
            }

            .flowpay-card-number {
                margin-top: 32px;
                font-size: 13px;
            }

            .flowpay-card-bottom {
                left: 19px;
                right: 19px;
                bottom: 18px;
            }

            .flowpay-card-info {
                margin-top: 18px;
            }

            .flowpay-info-item {
                padding: 12px 5px;
            }

            .flowpay-info-value {
                font-size: 12px;
            }

            .flowpay-management {
                width: 100%;
            }

            .flowpay-security {
                align-items: flex-start;
            }

        }
    </style>


    <div class="flowpay-card-page">

        <div class="flowpay-card-container">

            {{-- =====================================================
                 RETOUR
                 ===================================================== --}}
            <a
                href="{{ route('dashboard') }}"
                class="flowpay-back"
            >
                <span>‹</span>
                <span>Retour</span>
            </a>


            {{-- =====================================================
                 TITRE
                 ===================================================== --}}
            <div class="flowpay-title">

                <h1>
                    Ma carte
                </h1>

                <p>
                    Consultez et gérez votre carte FlowPay.
                </p>

            </div>


            {{-- =====================================================
                 CONTENU PRINCIPAL
                 ===================================================== --}}
            <div class="flowpay-main">


                {{-- =================================================
                     CARTE
                     ================================================= --}}
                <section class="flowpay-card-panel">

                    <div class="flowpay-card-header">

                        <div>
                            <p class="flowpay-eyebrow">
                                Votre carte
                            </p>

                            <h2 class="flowpay-card-name">
                                Carte virtuelle
                            </h2>
                        </div>


                        <div class="flowpay-status">
                            <span class="flowpay-status-dot"></span>
                            <span>Active</span>
                        </div>

                    </div>


                    {{-- Carte bancaire --}}
                    <div class="flowpay-card-wrapper">

                        <div class="flowpay-bank-card">

                            <div class="flowpay-bank-top">

                                <div>
                                    <p class="flowpay-card-type">
                                        Carte virtuelle
                                    </p>

                                    <div class="flowpay-card-logo">
                                        Flow<span>Pay</span>
                                    </div>
                                </div>


                                <div class="flowpay-chip"></div>

                            </div>

<div class="flowpay-card-number">
    <span id="flowpay-card-number">•••• •••• •••• ••••</span>
</div>

<div class="flowpay-card-bottom">

    <div>
        <p class="flowpay-card-label">
            Titulaire
        </p>

        <p class="flowpay-card-value">
            {{ Auth::user()->name }}
        </p>
    </div>

    <div class="flowpay-card-expiry">

        <p class="flowpay-card-label">
            Expire
        </p>

        <p class="flowpay-card-value">
            <span id="flowpay-card-expiry">••/••</span>
        </p>

    </div>

    <div>
        <p class="flowpay-card-label">
            CVV
        </p>

        <p class="flowpay-card-value">
            <span id="flowpay-card-cvv">•••</span>
        </p>
    </div>

</div>

                        </div>

                    </div>


                    {{-- Informations --}}
                    <div class="flowpay-card-info">

                        <div class="flowpay-info-item">

                            <p class="flowpay-info-label">
                                Type
                            </p>

                            <p class="flowpay-info-value">
                                Virtuelle
                            </p>

                        </div>


                        <div class="flowpay-info-separator"></div>


                        <div class="flowpay-info-item">

                            <p class="flowpay-info-label">
                                Statut
                            </p>

                            <p class="flowpay-info-value active">
                                Active
                            </p>

                        </div>


                        <div class="flowpay-info-separator"></div>


                        <div class="flowpay-info-item">

                            <p class="flowpay-info-label">
                                Carte
                            </p>

                            <p class="flowpay-info-value">
                                ••••4821
                            </p>

                        </div>

                    </div>

                </section>


                {{-- =================================================
                     GESTION
                     ================================================= --}}
                <aside class="flowpay-management">

                    <div class="flowpay-management-header">

                        <p class="flowpay-eyebrow">
                            Gestion
                        </p>

                        <h2 class="flowpay-management-title">
                            Contrôles de la carte
                        </h2>

                    </div>


                    <div class="flowpay-actions">

                        {{-- Paramètres --}}
                        <button
                            type="button"
                            class="flowpay-action"
                        >

                            <span class="flowpay-action-icon">
                                ⚙
                            </span>

                            <span class="flowpay-action-content">

                                <span class="flowpay-action-title">
                                    Paramètres
                                </span>

                                <span class="flowpay-action-description">
                                    Gérer les options de votre carte
                                </span>

                            </span>

                            <span class="flowpay-action-arrow">
                                ›
                            </span>

                        </button>


                        {{-- Bloquer --}}
                        <button
                            type="button"
                            class="flowpay-action danger"
                        >

                            <span class="flowpay-action-icon danger">
                                !
                            </span>

                            <span class="flowpay-action-content">

                                <span class="flowpay-action-title danger">
                                    Bloquer la carte
                                </span>

                                <span class="flowpay-action-description">
                                    Désactiver temporairement les paiements
                                </span>

                            </span>

                            <span class="flowpay-action-arrow">
                                ›
                            </span>

                        </button>

                    </div>


                    {{-- Protection --}}
                    <div class="flowpay-protection">

                        <div class="flowpay-protection-box">

                            <span class="flowpay-protection-icon">
                                ✓
                            </span>

                            <div>

                                <p class="flowpay-protection-title">
                                    Carte protégée
                                </p>

                                <p class="flowpay-protection-text">
                                    Votre carte est active et bénéficie des protections de sécurité FlowPay.
                                </p>

                            </div>

                        </div>

                    </div>

                </aside>

            </div>


            {{-- =====================================================
                 SÉCURITÉ
                 ===================================================== --}}
            <div class="flowpay-security">

                <div class="flowpay-security-icon">
                    ✓
                </div>

                <div>

                    <p class="flowpay-security-title">
                        Sécurité FlowPay
                    </p>

                    <p class="flowpay-security-text">
                        Ne communiquez jamais votre numéro complet,
                        votre code de sécurité ou vos informations sensibles.
                    </p>

                </div>

            </div>

        </div>

    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const storedCard = sessionStorage.getItem('flowpay_demo_card');

        if (!storedCard) {
            return;
        }

        try {
            const card = JSON.parse(storedCard);

            const number = document.getElementById('flowpay-card-number');
            const expiry = document.getElementById('flowpay-card-expiry');
            const cvv = document.getElementById('flowpay-card-cvv');

            if (number && card.number) {
                const digits = card.number.replace(/\D/g, '');
                const lastFour = digits.slice(-4);

                if (lastFour.length === 4) {
                    number.textContent = `•••• •••• •••• ${lastFour}`;
                }
            }

            if (expiry && card.expiry) {
                expiry.textContent = card.expiry;
            }

            if (cvv && card.cvv) {
                cvv.textContent = card.cvv;
            }
        } catch (error) {
            sessionStorage.removeItem('flowpay_demo_card');
        }
    });
</script>

</x-app-layout>
