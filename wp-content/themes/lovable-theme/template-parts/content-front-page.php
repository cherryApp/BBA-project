<?php
/**
 * Template part for displaying the front page content
 * 
 * This recreates the main content from the Next.js Index.tsx file
 */

// Get theme data or use defaults - Updated to match template design with status badges
$threats_data = array(
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 19c-.77.833.192 2.5 1.732 2.5z"></path></svg>',
        'title' => 'Adathalászat (Phishing)',
        'description' => 'Hamis e-mailek és weboldalak segítségével próbálják megszerezni személyes adatait.',
        'severity' => 'Magas',
        'status' => 'Új',
        'tips' => array(
            'Soha ne kattintson gyanús linkekre',
            'Ellenőrizze a feladó címét',
            'Bankja sosem kér jelszót e-mailben'
        )
    ),
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>',
        'title' => 'Gyenge jelszavak',
        'description' => 'Egyszerű vagy újrahasznált jelszavak könnyen feltörhetők.',
        'severity' => 'Aktív',
        'status' => 'Aktív',
        'tips' => array(
            'Használjon erős, egyedi jelszavakat',
            'Alkalmazzon kétfaktoros hitelesítést',
            'Jelszókezelő használata ajánlott'
        )
    ),
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>',
        'title' => 'Nem biztonságos WiFi',
        'description' => 'Nyilvános WiFi hálózatok veszélyeztethetik adatait.',
        'severity' => 'Közepes',
        'status' => 'Közepes',
        'tips' => array(
            'Kerülje a bankolást nyilvános WiFi-n',
            'Használjon VPN-t',
            'Kapcsolja ki az automatikus csatlakozást'
        )
    ),
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
        'title' => 'Kártékony alkalmazások',
        'description' => 'Gyanús appok vírusokat telepíthetnek eszközére.',
        'severity' => 'Magas',
        'status' => 'Új',
        'tips' => array(
            'Csak hivatalos áruházakból töltse le az appokat',
            'Ellenőrizze az engedélyeket',
            'Tartsa naprakészen az alkalmazásokat'
        )
    )
);

$best_practices_data = array(
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
        'title' => 'Rendszeres biztonsági mentés',
        'description' => 'Készítsen rendszeresen biztonsági másolatot fontos adatairól.'
    ),
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>',
        'title' => 'Adatvédelmi beállítások',
        'description' => 'Ellenőrizze és állítsa be a közösségi média és online szolgáltatások adatvédelmi beállításait.'
    ),
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>',
        'title' => 'Szoftver frissítések',
        'description' => 'Tartsa naprakészen operációs rendszerét és alkalmazásait a biztonsági javítások miatt.'
    ),
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'title' => 'Digitális tudatosság',
        'description' => 'Legyen óvatos az online megosztásokkal és a személyes információk közzétételével.'
    )
);
?>

<!-- Target Groups - Positioned first to match template -->
<section class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Célcsoportjaink</h2>
            <p class="text-gray-900">Programjaink különböző korcsoportok számára nyújtanak segítséget a digitális
                biztonság területén</p>
        </div>
        <div class="grid grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                        xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-graduation-cap w-10 h-10 text-blue-600">
                        <path
                            d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z">
                        </path>
                        <path d="M22 10v6"></path>
                        <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                    </svg></div>
                <h3 class="text-lg font-semibold text-gray-900">Általános és középiskolák</h3>
                <p class="text-sm text-gray-600">Oktatási intézmények</p>
            </div>
            <div class="text-center">
                <div class="text-black bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                        xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users w-10 h-10 text-blue-600">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg></div>
                <h3 class="text-lg font-semibold text-gray-900">Felnőttek</h3>
                <p class="text-sm text-gray-600">Aktív korú lakosság</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                        xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user-check w-10 h-10 text-blue-600">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <polyline points="16 11 18 13 22 9"></polyline>
                    </svg></div>
                <h3 class="text-lg font-semibold text-gray-900">Idősek</h3>
                <p class="text-sm text-gray-600">65+ korosztály</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                        xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-book-open w-10 h-10 text-orange-600">
                        <path d="M12 7v14"></path>
                        <path
                            d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z">
                        </path>
                    </svg></div>
                <h3 class="text-lg font-semibold text-gray-900">Vállalatok, Intézmények</h3>
                <p class="text-sm text-gray-600">Üzleti és közszféra</p>
            </div>
        </div>
    </div>
</section>

<!-- Hero Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-blue">
    <div class="max-w-4xl mx-auto text-center">
        <div class="space-y-6">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                <?php esc_html_e('Védje meg magát a digitális térben', 'lovable-theme'); ?>
            </h2>
            <p class="text-xl text-gray-700 mb-8 leading-relaxed">
                <?php esc_html_e('Kecskemét lakosainak szóló útmutató a leggyakoribb kiberbiztonsági fenyegetésekről és a biztonságos internethasználatról. Ismerje meg a veszélyeket és védekezzen ellenük!', 'lovable-theme'); ?>
            </p>
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="badge badge-outline px-4 py-2 text-sm">
                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                    <?php esc_html_e('Adatvédelem', 'lovable-theme'); ?>
                </span>
                <span class="badge badge-outline px-4 py-2 text-sm">
                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                    <?php esc_html_e('Biztonságos jelszavak', 'lovable-theme'); ?>
                </span>
                <span class="badge badge-outline px-4 py-2 text-sm">
                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 19c-.77.833.192 2.5 1.732 2.5z">
                        </path>
                    </svg>
                    <?php esc_html_e('Fenyegetések felismerése', 'lovable-theme'); ?>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Threats Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">
                <?php esc_html_e('Leggyakoribb digitális fenyegetések', 'lovable-theme'); ?>
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e('Ismerje meg azokat a veszélyeket, amelyekkel napi szinten találkozhat az interneten, és tanulja meg, hogyan védekezhet ellenük.', 'lovable-theme'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($threats_data as $threat): ?>
                <?php lovable_display_threat_card($threat); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Best Practices Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-green-blue">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">
                <?php esc_html_e('Biztonsági ajánlások', 'lovable-theme'); ?>
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e('Kövesse ezeket az egyszerű lépéseket a biztonságos digitális környezet kialakításához.', 'lovable-theme'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($best_practices_data as $practice): ?>
                <?php lovable_display_best_practice_card($practice); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Emergency Contact Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="card border-orange-200 bg-orange-50">
            <div class="card-header text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="card-title text-2xl text-orange-900">
                    <?php esc_html_e('Segítségre van szüksége?', 'lovable-theme'); ?>
                </h3>
                <p class="card-description text-orange-700 text-base">
                    <?php esc_html_e('Ha kiberbiztonsági incidensbe keveredett, vagy gyanús tevékenységet észlelt, ne habozzon segítséget kérni.', 'lovable-theme'); ?>
                </p>
            </div>
            <div class="card-content text-center space-y-4">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg border border-orange-200">
                        <h4 class="font-semibold text-gray-900 mb-2">
                            <?php esc_html_e('Rendőrség Kiberbűnözés Elleni Főosztály', 'lovable-theme'); ?>
                        </h4>
                        <p class="text-sm text-gray-600 mb-3">
                            <?php esc_html_e('Kiberbiztonsági incidensek bejelentése', 'lovable-theme'); ?>
                        </p>
                        <a href="#" class="btn btn-outline w-full">
                            <?php esc_html_e('Bejelentés', 'lovable-theme'); ?>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-lg border border-orange-200">
                        <h4 class="font-semibold text-gray-900 mb-2">
                            <?php esc_html_e('Kecskemét Informatikai Irodája', 'lovable-theme'); ?>
                        </h4>
                        <p class="text-sm text-gray-600 mb-3">
                            <?php esc_html_e('Helyi támogatás és tanácsadás', 'lovable-theme'); ?>
                        </p>
                        <a href="#" class="btn btn-outline w-full">
                            <?php esc_html_e('Kapcsolat', 'lovable-theme'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>