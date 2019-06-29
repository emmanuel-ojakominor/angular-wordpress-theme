import { Component, OnInit } from '@angular/core';
import {RestAPIService} from "../../services/rest-api.service";
import {ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-page',
  templateUrl: './page.component.html',
  styleUrls: ['./page.component.scss']
})
export class PageComponent implements OnInit {

  private page_id: any;
  private page: any;
  constructor( private api: RestAPIService, private route: ActivatedRoute ) {
    if ( this.route.snapshot.params ) {
      this.page_id = this.route.snapshot.params.id;
    }
  }

  ngOnInit() {
    this.api.getPage( this.page_id ).subscribe( data => {
      this.page = data;
    });
  }

}