terraform {
  backend "s3" {
    bucket                  = "<<PLACEHOLDER>>"
    key                     = "gtmi-demo-staging/terraform.tfstate"
    region                  = "ap-northeast-1"
  }
}
