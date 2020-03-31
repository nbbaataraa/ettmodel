import Token from "./Token";
import AppStorage from "./AppStorage";

class User {
    login(data) {
        axios
            .post("/api/auth/login", data)
            .then(res => this.responseAfterLogin(res))
            .catch(error => console.log(error.response.data));
        // alert("Username of password incorrect");
    }
    responseAfterLogin(res) {
        const access_token = res.data.access_token;
        const username = res.data.user;
        if (Token.isValid(res.data.access_token)) {
            AppStorage.store(username, access_token);
            window.location = "/dashboard";
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false;
        }
        return false;
    }
    loggedIn() {
        return this.hasToken();
    }

    logOut() {
        AppStorage.clear();
        window.location = "/dashboard";
    }

    id() {
        if (this.loggedIn) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }
    // Нэвтэрсэн хэрэглэгчийн утгыг авна. Энэ нь id() функцыг дуудана.
    loggedOwnID(id) {
        return this.id() == id;
    }

    name() {
        if (this.loggedIn) {
            return AppStorage.getUser();
        }
    }
}
export default User = new User();
