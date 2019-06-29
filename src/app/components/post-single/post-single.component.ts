
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
    this.api.getPostBySlug( this.post_id ).subscribe(data => {
      /**
       * Because we're only searching by a specific slug for a specific post,
       * there should only be one post that returns, so grab only the first, i.e., data[0].
       */
      this.post = data[0];
    });
  }
}
