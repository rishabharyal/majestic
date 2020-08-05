import axios from "axios";
import {
  API_URL
} from "./config";

const Web = {
  init() {
    axios.defaults.baseURL = API_URL;

    axios.defaults.headers.common["Content-Type"] = `application/x-www-form-urlencoded`;
  },

  query(resource, params) {
    return axios
      .get(resource, {
        params
      })
      .catch(error => {
        throw new Error(`[RWV] Web Service ${error}`);
      });
  },

  get(resource, slug = "", params = {}) {
    if (slug) slug = "/" + slug;
    return axios.get(`${resource}${slug}`, {
      params
    }).catch(error => {
      throw new Error(`[RWV] Web Service ${error}`);
    });
  },

  post(resource, params) {
    return axios.post(`${resource}`, params);
  },

  update(resource, slug, params) {
    return axios.put(`${resource}/${slug}`, params);
  },

  put(resource, params) {
    return axios.put(`${resource}`, params);
  },

  delete(resource) {
    return axios.delete(resource).catch(error => {
      throw new Error(`[RWV] Web Service ${error}`);
    });
  }
};

export default Web;

const CleaningServices = {
  query(params = {}) {
    return Web.query('cleanings', params);
  },
  get(id) {
    return Web.get("cleanings", id);
  },
  getExtraCleaningIdentities() {
    return Web.get("extra-identities");
  }
};
const CleaningTypesServices = {
  query(params = {}) {
    return Web.query('cleaning-types', params);
  },
  getExtraCleaningTypes() {
    return Web.get("extra-services");
  },
  getFinalCleaningTypes() {
    return Web.get("additional-services");
  }
};
const BookingServices = {
  save(data = {}) {
    return Web.post('booking', data);
  }
};
export { CleaningServices, CleaningTypesServices, BookingServices };