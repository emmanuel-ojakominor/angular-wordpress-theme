import { Component, OnInit } from '@angular/core';
import { RestAPIService } from '../../services/rest-api.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-post-single',
  templateUrl: './post-single.component.html',
  styleUrls: ['./post-single.component.scss']
})
export class PostSingleComponent implements OnInit {
  private post_id: any;
  private post: any;
  constructor(
      private api: RestAPIService,
      private route: ActivatedRoute ) {
    if ( this.route.snapshot.params ) {
      this.post_id = this.route.snapshot.params.id;
    }
  }

  ngOnInit() {
    this.api.getPost( this.post_id ).subscribe(data => {
      this.post = data;
    });
  }

}
