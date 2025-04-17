FROM node:20

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

# Install mysql-client for healthcheck
RUN apt-get update && apt-get install -y default-mysql-client

EXPOSE 8080

CMD ["npm", "start"]
