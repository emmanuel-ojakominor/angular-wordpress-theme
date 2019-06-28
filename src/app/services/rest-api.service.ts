import { Injectable } from '@angular/core';
import { WindowService} from './window.service';
import { HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class RestAPIService {
  private api_url: any;
  constructor( private win: WindowService, private http: HttpClient) {
    this.api_url =
        ( this.win.nativeWindow.api_settings ) ?
            this.win.nativeWindow.api_settings.root + 'wp/v2/' :
            'http://angularwp.local/wp-json/wp/v2/';
  }

  /**
   * To get the latest posts from our blog
   */
  getPosts() {
    return this.http.get( this.api_url + 'posts' );
  }

  getPost( post_id ) {
    return this.http.get( this.api_url + 'posts/' + post_id );
  }

  getPage( page_id ) {
    return this.http.get( this.api_url + 'pages/' + page_id );
  }
}
