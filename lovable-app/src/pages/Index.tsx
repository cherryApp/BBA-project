
import { Shield, AlertTriangle, Lock, Eye, Wifi, Smartphone, Users, HelpCircle, GraduationCap, BookOpen, UserCheck } from "lucide-react";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Separator } from "@/components/ui/separator";
import KecskeMetLogo from "@/components/KecskeMetLogo";

const Index = () => {
  const threats = [
    {
      icon: AlertTriangle,
      title: "Adathalászat (Phishing)",
      description: "Hamis e-mailek és weboldalak segítségével próbálják megszerezni személyes adatait.",
      severity: "Magas",
      tips: ["Soha ne kattintson gyanús linkekre", "Ellenőrizze a feladó címét", "Bankja sosem kér jelszót e-mailben"]
    },
    {
      icon: Lock,
      title: "Gyenge jelszavak",
      description: "Egyszerű vagy újrahasznált jelszavak könnyen feltörhetők.",
      severity: "Közepes",
      tips: ["Használjon erős, egyedi jelszavakat", "Alkalmazzon kétfaktoros hitelesítést", "Jelszókezelő használata ajánlott"]
    },
    {
      icon: Wifi,
      title: "Nem biztonságos WiFi",
      description: "Nyilvános WiFi hálózatok veszélyeztethetik adatait.",
      severity: "Közepes",
      tips: ["Kerülje a bankolást nyilvános WiFi-n", "Használjon VPN-t", "Kapcsolja ki az automatikus csatlakozást"]
    },
    {
      icon: Smartphone,
      title: "Kártékony alkalmazások",
      description: "Gyanús appok vírusokat telepíthetnek eszközére.",
      severity: "Magas",
      tips: ["Csak hivatalos áruházakból töltse le az appokat", "Ellenőrizze az engedélyeket", "Tartsa naprakészen az alkalmazásokat"]
    }
  ];

  const bestPractices = [
    {
      icon: Shield,
      title: "Rendszeres biztonsági mentés",
      description: "Készítsen rendszeresen biztonsági másolatot fontos adatairól."
    },
    {
      icon: Eye,
      title: "Adatvédelmi beállítások",
      description: "Ellenőrizze és állítsa be a közösségi média és online szolgáltatások adatvédelmi beállításait."
    },
    {
      icon: Lock,
      title: "Szoftver frissítések",
      description: "Tartsa naprakészen operációs rendszerét és alkalmazásait a biztonsági javítások miatt."
    },
    {
      icon: Users,
      title: "Digitális tudatosság",
      description: "Legyen óvatos az online megosztásokkal és a személyes információk közzétételével."
    }
  ];

  const getSeverityColor = (severity: string) => {
    switch (severity) {
      case "Magas": return "destructive";
      case "Közepes": return "secondary";
      default: return "default";
    }
  };

  return (
    <div className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      {/* Header Banner */}
      <header className="w-full">
        <img 
          src="/lovable-uploads/b7c2651a-4931-45d8-8290-923fa486cbef.png" 
          alt="Széchenyi Terv Plusz és EU logók banner" 
          className="w-full h-auto"
        />
      </header>

      {/* Navigation Menu */}
      <nav className="bg-white shadow-sm border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-center space-x-8">
            <a href="#" className="py-4 px-6 text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors font-medium">
              Rendezvények
            </a>
            <a href="#" className="py-4 px-6 text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors font-medium">
              Galéria
            </a>
            <a href="#" className="py-4 px-6 text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors font-medium">
              Hírek
            </a>
            <a href="#" className="py-4 px-6 text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors font-medium">
              Friss információk
            </a>
          </div>
        </div>
      </nav>

      {/* Project Info Section */}
      <section className="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-900 to-blue-800 relative">
        <div 
          className="absolute inset-0 opacity-20 bg-cover bg-center"
          style={{
            backgroundImage: "url('/lovable-uploads/72cf8e0c-4371-46b8-a0d1-85d7265a80af.png')"
          }}
        />
        <div className="max-w-7xl mx-auto text-center relative z-10">
          <h1 className="text-3xl md:text-4xl font-semibold text-white mb-4 leading-relaxed">
            Kiberbűnözés elleni fellépést célzó megelőzési programok Kecskeméten és térségében
          </h1>
          <p className="text-base font-normal text-white/90">BBA_PLUSZ-3.3.2-24-2024-00009</p>
        </div>
      </section>

      {/* Target Groups */}
      <section className="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-8">
            <h2 className="text-2xl font-bold text-gray-900 mb-4">
              Célcsoportjaink
            </h2>
            <p className="text-gray-600">
              Programjaink különböző korcsoportok számára nyújtanak segítséget a digitális biztonság területén
            </p>
          </div>
          
          <div className="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div className="text-center">
              <div className="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <GraduationCap className="w-10 h-10 text-blue-600" />
              </div>
              <h3 className="text-lg font-semibold text-gray-900">Általános és középiskolák</h3>
              <p className="text-sm text-gray-600">Oktatási intézmények</p>
            </div>
            
            <div className="text-center">
              <div className="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <Users className="w-10 h-10 text-green-600" />
              </div>
              <h3 className="text-lg font-semibold text-gray-900">Felnőttek</h3>
              <p className="text-sm text-gray-600">Aktív korú lakosság</p>
            </div>
            
            <div className="text-center">
              <div className="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <UserCheck className="w-10 h-10 text-purple-600" />
              </div>
              <h3 className="text-lg font-semibold text-gray-900">Idősek</h3>
              <p className="text-sm text-gray-600">65+ korosztály</p>
            </div>
            
            <div className="text-center">
              <div className="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <BookOpen className="w-10 h-10 text-orange-600" />
              </div>
              <h3 className="text-lg font-semibold text-gray-900">Vállalatok, Intézmények</h3>
              <p className="text-sm text-gray-600">Üzleti és közszféra</p>
            </div>
          </div>
        </div>
      </section>

      {/* Hero Section */}
      <section className="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-white">
        <div className="max-w-4xl mx-auto text-center">
          <div className="space-y-6">
            <h2 className="text-4xl font-bold text-gray-900 mb-6">
              Védje meg magát a digitális térben
            </h2>
            <p className="text-xl text-gray-700 mb-8 leading-relaxed">
              Kecskemét lakosainak szóló útmutató a leggyakoribb kiberbiztonsági fenyegetésekről 
              és a biztonságos internethasználatról. Ismerje meg a veszélyeket és védekezzen ellenük!
            </p>
            <div className="flex flex-wrap justify-center gap-4 mb-12">
              <Badge variant="outline" className="px-4 py-2 text-sm">
                <Shield className="w-4 h-4 mr-2" />
                Adatvédelem
              </Badge>
              <Badge variant="outline" className="px-4 py-2 text-sm">
                <Lock className="w-4 h-4 mr-2" />
                Biztonságos jelszavak
              </Badge>
              <Badge variant="outline" className="px-4 py-2 text-sm">
                <AlertTriangle className="w-4 h-4 mr-2" />
                Fenyegetések felismerése
              </Badge>
            </div>
          </div>
        </div>
      </section>

      {/* Threats Section */}
      <section className="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-bold text-gray-900 mb-4">
              Leggyakoribb digitális fenyegetések
            </h3>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Ismerje meg azokat a veszélyeket, amelyekkel napi szinten találkozhat az interneten, 
              és tanulja meg, hogyan védekezhet ellenük.
            </p>
          </div>

          <div className="grid md:grid-cols-2 gap-8">
            {threats.map((threat, index) => (
              <Card key={index} className="hover:shadow-lg transition-shadow">
                <CardHeader>
                  <div className="flex items-start justify-between">
                    <div className="flex items-center space-x-3">
                      <div className="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <threat.icon className="w-6 h-6 text-red-600" />
                      </div>
                      <CardTitle className="text-xl">{threat.title}</CardTitle>
                    </div>
                    <Badge variant={getSeverityColor(threat.severity)}>
                      {threat.severity}
                    </Badge>
                  </div>
                  <CardDescription className="text-base">
                    {threat.description}
                  </CardDescription>
                </CardHeader>
                <CardContent>
                  <div className="space-y-2">
                    <h4 className="font-semibold text-green-700 mb-2">Védekezési tippek:</h4>
                    <ul className="space-y-1">
                      {threat.tips.map((tip, tipIndex) => (
                        <li key={tipIndex} className="flex items-start space-x-2">
                          <div className="w-1.5 h-1.5 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                          <span className="text-sm text-gray-700">{tip}</span>
                        </li>
                      ))}
                    </ul>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Best Practices Section */}
      <section className="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-green-50 to-blue-50">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-bold text-gray-900 mb-4">
              Biztonsági ajánlások
            </h3>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Kövesse ezeket az egyszerű lépéseket a biztonságos digitális környezet kialakításához.
            </p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {bestPractices.map((practice, index) => (
              <Card key={index} className="text-center hover:shadow-lg transition-shadow">
                <CardHeader>
                  <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <practice.icon className="w-8 h-8 text-blue-600" />
                  </div>
                  <CardTitle className="text-lg">{practice.title}</CardTitle>
                </CardHeader>
                <CardContent>
                  <CardDescription className="text-sm">
                    {practice.description}
                  </CardDescription>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Emergency Contact Section */}
      <section className="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div className="max-w-4xl mx-auto">
          <Card className="border-orange-200 bg-orange-50">
            <CardHeader className="text-center">
              <div className="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <HelpCircle className="w-8 h-8 text-orange-600" />
              </div>
              <CardTitle className="text-2xl text-orange-900">
                Segítségre van szüksége?
              </CardTitle>
              <CardDescription className="text-orange-700 text-base">
                Ha kiberbiztonsági incidensbe keveredett, vagy gyanús tevékenységet észlelt, 
                ne habozzon segítséget kérni.
              </CardDescription>
            </CardHeader>
            <CardContent className="text-center space-y-4">
              <div className="grid md:grid-cols-2 gap-6">
                <div className="bg-white p-6 rounded-lg border border-orange-200">
                  <h4 className="font-semibold text-gray-900 mb-2">Rendőrség Kiberbűnözés Elleni Főosztály</h4>
                  <p className="text-sm text-gray-600 mb-3">Kiberbiztonsági incidensek bejelentése</p>
                  <Button variant="outline" className="w-full">
                    Bejelentés
                  </Button>
                </div>
                <div className="bg-white p-6 rounded-lg border border-orange-200">
                  <h4 className="font-semibold text-gray-900 mb-2">Kecskemét Informatikai Irodája</h4>
                  <p className="text-sm text-gray-600 mb-3">Helyi támogatás és tanácsadás</p>
                  <Button variant="outline" className="w-full">
                    Kapcsolat
                  </Button>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8">
        <div className="max-w-7xl mx-auto">
          <div className="text-center">
            <div className="flex items-center justify-center space-x-4 mb-6">
              <div className="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                <Shield className="w-6 h-6 text-white" />
              </div>
              <h4 className="text-xl font-bold">Kecskemét Megyei Jogú Város</h4>
            </div>
            <Separator className="my-6 bg-gray-700" />
            <div className="grid md:grid-cols-3 gap-8 text-sm">
              <div>
                <h5 className="font-semibold mb-2">Elérhetőség</h5>
                <p className="text-gray-400">6000 Kecskemét, Kossuth tér 1.</p>
                <p className="text-gray-400">Tel: +36 76 513-513</p>
              </div>
              <div>
                <h5 className="font-semibold mb-2">Hasznos linkek</h5>
                <p className="text-gray-400">kecskemet.hu</p>
                <p className="text-gray-400">kiberpajzs.hu</p>
              </div>
              <div>
                <h5 className="font-semibold mb-2">Frissítve</h5>
                <p className="text-gray-400">2024. július</p>
                <p className="text-gray-400">Digitális Biztonság Projekt</p>
              </div>
            </div>
            <Separator className="my-6 bg-gray-700" />
            <p className="text-gray-400 text-xs">
              © 2024 Kecskemét Megyei Jogú Város. Minden jog fenntartva. 
              Ez az oldal a polgárok digitális biztonságának növelését szolgálja.
            </p>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default Index;
