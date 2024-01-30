import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
import { User } from '../models/user.models';
import { Observable, catchError } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  router: any;
  getUserProfile(id: string | null) {
    throw new Error('Method not implemented.');
  }
  APIUrl = `${environment.api}/`
  user: User | undefined  

  constructor(private http: HttpClient) {}

  signIn(user: User) {
    return this.http.post<any>(`${this.APIUrl}/auth/login`, user).subscribe((res: any) => {
        localStorage.setItem('access_token', res.token);
      });
  }

  signUp(user: User): Observable<any> {
    return this.http.post(this.APIUrl + 'auth/register', user);
  }

  getToken() {
    return localStorage.getItem('access_token');
  }

  get isLoggedIn(): boolean {
    let authToken = localStorage.getItem('access_token');
    return authToken !== null ? true : false;
  }

  doLogout() {
    let removeToken = localStorage.removeItem('access_token');
    if (removeToken == null) {
      this.router.navigate(['login']);
    }
  }
  
}
