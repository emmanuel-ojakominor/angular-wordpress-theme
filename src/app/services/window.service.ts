import { Injectable } from '@angular/core';

/**
 * WindowService responsible for returning our Window object.
 */

function __window(): any {
  return window;
}

@Injectable({
  providedIn: 'root'
})
export class WindowService {

  constructor() { }

  get nativeWindow(): any {
    return __window();
  }
}
