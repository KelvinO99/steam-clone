import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
import { User } from '../models/user.models';
import { BehaviorSubject, Observable, catchError, tap } from 'rxjs';

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
  private loggedInSubject = new BehaviorSubject<boolean>(false);
  loggedIn$ = this.loggedInSubject.asObservable();
 

  constructor(private http: HttpClient) {
    this.checkLoggedIn();
  }

  checkLoggedIn() {
    let token = localStorage.getItem('access_token');
    if (token) {
      this.loggedInSubject.next(true);
    } else {
      this.loggedInSubject.next(false);
    }
  }

  signIn(user: User) {
    return this.http.post<any>(`${this.APIUrl}auth/login`, user).pipe(tap( res => {
        localStorage.setItem('access_token', res.access_token);
        localStorage.setItem('role', res.role);
        localStorage.setItem('user_profile_username', res.user['username']);
        this.loggedInSubject.next(true);
      }));
  }

  signUp(user: User): Observable<any> {
    return this.http.post(this.APIUrl + 'auth/register', user);
  }

  getToken() {
    return localStorage.getItem('access_token');
  }

  getUsername() {
    return localStorage.getItem('user_profile_username');
  }

  get isLoggedIn(): boolean {
    let authToken = localStorage.getItem('access_token');
    return authToken !== null ? true : false;
  }

  doLogout() {
    localStorage.removeItem('access_token');
    localStorage.removeItem('user_profile_username');
    this.loggedInSubject.next(false); // Notifica agli osservatori che l'utente non è loggato
  } 
  
}
