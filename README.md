# IKijelző - digital signage rendszer az ELTE IK-n
## Felhasználói dokumentáció

## Fejlesztői dokumentáció
A projekt felhasznált technológiák és technikák szempontjából próbál illeszkedni a Webprogramozás tantárgy tematikájához, így segédanyagként kifejezetten ajánlott.

### Szerveroldal
Az `src/server` mappában egy egyszerű, formokkal megvalósított PHP alkalmazás található, a tárgyon ismertetett `Storage` és `Auth` modulok használatával.

Az `_`alávonással kezdődő file nevek "rendszerscriptek", normál esetben a felhasználót csak úgy navigálható ide, hogy utána vissza is irányítjuk máshová.
#### Fejlesztési lehetőségek
- [ ] kliensek állapotának követése  
    jelenleg a kliensek legutóbbi csatlakozási időpontját és letöltött fájlját tárolja, ezt ki lehet egészíteni egy vizuálisan egyértelműbb megjelenítésre (pl. `🛑 az Előadósor kleins 2 perce nem kért új képet!`), valamint érdemes az inaktív kliensek bejegyzéseit idővel törölni.
- [ ] videós slide-ok időtartamának megjelenítése, valamint automatikus eltárolása
- [ ] adminisztrátor funkciók, új felhasználó regisztrálása
- [ ] UI/UX fejlesztés