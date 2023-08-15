## docker 命令 --help

[root@Rocky8 ~]# docker ps  -h
Emulate Docker CLI using podman. Create /etc/containers/nodocker to quiet msg.
List containers

Description:
  Prints out information about the containers

Usage:
  podman ps [options]

Examples:
  podman ps -a
  podman ps -a --format "{{.ID}}  {{.Image}}  {{.Labels}}  {{.Mounts}}"
  podman ps --size --sort names

Options:
  -a, --all              Show all the containers, default is only running containers
      --external         Show containers in storage not controlled by Podman
  -f, --filter strings   Filter output based on conditions given
      --format string    Pretty-print containers to JSON or using a Go template
  -n, --last int         Print the n last created containers (all states) (default -1)
  -l, --latest           Act on the latest container podman is aware of
                         Not supported with the "--remote" flag
      --no-trunc         Display the extended information
      --noheading        Do not print headers
      --ns               Display namespace information
  -p, --pod              Print the ID and name of the pod the containers are associated with
  -q, --quiet            Print the numeric IDs of the containers only
  -s, --size             Display the total file sizes
      --sort choice      Sort output by: command, created, id, image, names, runningfor, size, status
      --sync             Sync container state with OCI runtime
  -w, --watch uint       Watch the ps output on an interval in seconds

## docker images 列出所有镜像

[root@Rocky8 /]# docker images
Emulate Docker CLI using podman. Create /etc/containers/nodocker to quiet msg.
REPOSITORY            TAG         IMAGE ID      CREATED      SIZE
quay.io/podman/hello  latest      a903f94120d0  12 days ago  82 kB

## docker search 搜索镜像

[root@Rocky8 /]# docker search  hello-world
Emulate Docker CLI using podman. Create /etc/containers/nodocker to quiet msg.
NAME                                                DESCRIPTION
docker.io/library/hello-world                       Hello World! (an example of minimal Dockeriz...
docker.io/rancher/hello-world                       
docker.io/okteto/hello-world                        
docker.io/golift/hello-world                        Hello World Go-App built by Go Lift Applicat...
docker.io/tacc/hello-world                          
docker.io/armswdev/c-hello-world                    Simple hello-world C program on Alpine Linux...
docker.io/tutum/hello-world                         Image to test docker deployments. Has Apache...
docker.io/thomaspoignant/hello-world-rest-json      This project is a REST hello-world API to bu...
docker.io/kitematic/hello-world-nginx               A light-weight nginx container that demonstr...
docker.io/dockercloud/hello-world                   Hello World!
docker.io/ansibleplaybookbundle/hello-world-apb     An APB which deploys a sample Hello World! a...
docker.io/ansibleplaybookbundle/hello-world-db-apb  An APB which deploys a sample Hello World! a...
docker.io/crccheck/hello-world                      Hello World web server in under 2.5 MB
docker.io/strimzi/hello-world-consumer              
docker.io/strimzi/hello-world-producer              
docker.io/businessgeeks00/hello-world-nodejs        
docker.io/koudaiii/hello-world                      
docker.io/freddiedevops/hello-world-spring-boot     
docker.io/strimzi/hello-world-streams               
docker.io/garystafford/hello-world                  Simple hello-world Spring Boot service for t...
docker.io/ppc64le/hello-world                       Hello World! (an example of minimal Dockeriz...
docker.io/tsepotesting123/hello-world               
docker.io/kevindockercompany/hello-world            
docker.io/dandando/hello-world-dotnet               
docker.io/vad1mo/hello-world-rest                   A simple REST Service that echoes back all t...

## docker pull 下载镜像

[root@Rocky8 /]# docker pull hello-world
Emulate Docker CLI using podman. Create /etc/containers/nodocker to quiet msg.
Resolved "hello-world" as an alias (/etc/containers/registries.conf.d/000-shortnames.conf)
Trying to pull quay.io/podman/hello:latest...
Getting image source signatures
Copying blob 8730226d486e done  
Copying config a903f94120 done  
Writing manifest to image destination
Storing signatures
a903f94120d0010705ed61b474c5e0f7c2584a801a3b8a3d214f9261940a3b8c

## docker rmi 删除镜像

[root@Rocky8 /]# docker  rmi hello-world
Emulate Docker CLI using podman. Create /etc/containers/nodocker to quiet msg.
Untagged: quay.io/podman/hello:latest
Deleted: a903f94120d0010705ed61b474c5e0f7c2584a801a3b8a3d214f9261940a3b8c